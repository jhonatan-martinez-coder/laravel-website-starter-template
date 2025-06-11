<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NavBarOptionResource\Pages;
use App\Filament\Resources\NavBarOptionResource\RelationManagers;
use App\Models\NavBarOption;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Get;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class NavBarOptionResource extends Resource
{
    protected static ?string $model = NavBarOption::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                            ])
                            ->columnSpan(1),
                        Forms\Components\Section::make()
                            ->schema(
                                [
                                    Select::make('type')
                                        ->options([
                                            'link' => 'Link',
                                            'dropdown' => 'Dropdown',
                                        ]),
                                    TextInput::make('url')
                                        ->required(),
                                ]
                            )->columnSpan(1),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\columns\TextColumn::make('id')
                    ->numeric(),
                Tables\columns\TextColumn::make('name'),
                Tables\columns\TextColumn::make('type'),
                Tables\columns\TextColumn::make('url'),
                Tables\columns\TextColumn::make('parent_id')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\CreateCustomNavBar::route('/'),
            'create' => Pages\CreateNavBarOption::route('/create'),
            'edit' => Pages\EditNavBarOption::route('/{record}/edit'),
            'list' => Pages\ListNavBarOptions::route('/list')
        ];
    }
}
