<?php

namespace App\Filament\Resources\NavBarOptionResource\Pages;

use App\Filament\Resources\NavBarOptionResource;
use App\Models\NavBarOption;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Filament\Resources\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Forms\Get;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class CreateCustomNavBar extends Page implements HasForms, HasTable
{
    use InteractsWithTable, InteractsWithForms;
    protected static string $resource = NavBarOptionResource::class;

    protected static string $view = 'filament.resources.nav-bar-option-resource.pages.create-custom-nav-bar';

    public static ?string $title = 'Options';

    public static ?string $breadcrumb = 'index';

    public ?array $data = [];

    public function mount()
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form->schema($this->navBarFormSchema())->statePath('data');
    }

    public function navBarFormSchema()
    {
        return [
            Forms\Components\Section::make()
                ->schema([
                    Forms\components\TextInput::make('name')
                        ->required(),
                    Select::make('type')
                        ->options([
                            'link' => 'Link',
                            'dropdown' => 'Dropdown',
                        ]),
                    TextInput::make('url')
                        ->required(),
                    Select::make('parent_id')
                        ->label('Parent Option')
                        ->options(fn(): array => NavBarOption::query()
                            ->get()
                            ->pluck('name', 'id')
                            ->toArray())
                        ->searchable()
                        ->default(null),
                ])

        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(NavBarOption::query())
            ->selectable(true)
            ->paginated(true)
            ->columns([
                TextColumn::make('id')
                    ->numeric(),
                TextColumn::make('name'),
                TextColumn::make('type'),
                TextColumn::make('parent_id')
                    ->label('Parent')
            ])
            ->actions([
                Tables\Actions\DeleteAction::make()->action(function (NavBarOption $record) {
                    $record->delete();
                    $this->form->fill([]);
                }),
                Tables\Actions\Action::make('edit')
                    ->mountUsing(fn(Forms\ComponentContainer $form, NavBarOption $record) => $form->fill($record->toArray()))
                    ->form($this->navBarFormSchema())
                    ->action(function (NavBarOption $record, array $data) {
                        $record->update($data);
                    })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->paginated(true);
    }

    public function getFormActions()
    {
        return [
            Forms\Components\Actions\Action::make('submit')
                ->submit('submit')
        ];
    }

    public function submit()
    {
        $data = $this->form->getState();
        if (!isset($data['id'])) {
            NavBarOption::create($data);
            Notification::make()
                ->success()
                ->title('Option Updated Successfully')
                ->send();
                $this->form->fill([]);
        }
    }
}
