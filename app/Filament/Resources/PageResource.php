<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-plus';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    TextInput::make('title')
                        ->required(),
                    TextInput::make('slug')
                        ->required(),
                    Forms\Components\Section::make('Content')
                        ->schema([
                            Forms\Components\Builder::make('blocks')
                                ->blocks([
                                    Forms\Components\Builder\Block::make('heading')
                                        ->schema([
                                            TextInput::make('blocks')
                                                ->label('Heading')
                                                ->required(),
                                            Select::make('level')
                                                ->options([
                                                    'h1' => 'heading 1',
                                                    'h2' => 'heading 2',
                                                    'h3' => 'heading 3',
                                                    'h4' => 'heading 4',
                                                    'h5' => 'heading 5',
                                                    'h6' => 'heading 6'
                                                ])
                                                ->required()
                                        ]),
                                    Forms\Components\Builder\Block::make('intro')
                                        ->schema([
                                             RichEditor::make('blocks')
                                                ->label('Intro')
                                                ->toolbarButtons([
                                                    'attachFiles',
                                                    'blockquote',
                                                    'bold',
                                                    'bulletList',
                                                    'codeBlock',
                                                    'h2',
                                                    'h3',
                                                    'italic',
                                                    'link',
                                                    'orderedList',
                                                    'redo',
                                                    'strike',
                                                    'underline',
                                                    'undo',
                                                ])
                                                ->required(),
                                            FileUpload::make('url')
                                                ->label('Image')
                                                ->image()
                                                ->disk('public')
                                                ->imageEditor()
                                                ->required()
                                        ]),
                                    Forms\Components\Builder\Block::make('paragraph')
                                        ->schema([
                                            RichEditor::make('blocks')
                                                ->label('Paragraph')
                                                ->toolbarButtons([
                                                    'attachFiles',
                                                    'blockquote',
                                                    'bold',
                                                    'bulletList',
                                                    'codeBlock',
                                                    'h2',
                                                    'h3',
                                                    'italic',
                                                    'link',
                                                    'orderedList',
                                                    'redo',
                                                    'strike',
                                                    'underline',
                                                    'undo',
                                                ])
                                                ->required()
                                        ]),
                                    Forms\Components\Builder\Block::make('two_columns_paragraph')
                                        ->schema([
                                            RichEditor::make('column_1')
                                                ->label('Column 1')
                                                ->toolbarButtons([
                                                    'attachFiles',
                                                    'blockquote',
                                                    'bold',
                                                    'bulletList',
                                                    'codeBlock',
                                                    'h2',
                                                    'h3',
                                                    'italic',
                                                    'link',
                                                    'orderedList',
                                                    'redo',
                                                    'strike',
                                                    'underline',
                                                    'undo',
                                                ])
                                                ->extraAttributes(['style' => 'max-width: 30rem'])
                                                ->required(),
                                            RichEditor::make('column_2')
                                                ->label('Column 2')
                                                ->toolbarButtons([
                                                    'attachFiles',
                                                    'blockquote',
                                                    'bold',
                                                    'bulletList',
                                                    'codeBlock',
                                                    'h2',
                                                    'h3',
                                                    'italic',
                                                    'link',
                                                    'orderedList',
                                                    'redo',
                                                    'strike',
                                                    'underline',
                                                    'undo',
                                                ])
                                                ->extraAttributes(['style' => 'max-width: 30rem'])
                                                ->required()
                                        ]),
                                    Forms\Components\Builder\Block::make('blockquote')
                                        ->schema([
                                            Textarea::make('blocks')
                                                ->label('Blockquote')
                                                ->required()
                                        ]),
                                    Forms\Components\Builder\Block::make('mark_down_paragraph')
                                        ->schema([
                                            MarkdownEditor::make('blocks')
                                                ->label('Markdown Editor')
                                                ->toolbarButtons([
                                                    'attachFiles',
                                                    'blockquote',
                                                    'bold',
                                                    'bulletList',
                                                    'codeBlock',
                                                    'heading',
                                                    'italic',
                                                    'link',
                                                    'orderedList',
                                                    'redo',
                                                    'strike',
                                                    'table',
                                                    'undo',
                                                ])
                                                ->required(),
                                        ]),
                                    Forms\Components\Builder\Block::make('image')
                                        ->schema([
                                            FileUpload::make('url')
                                                ->label('Image')
                                                ->image()
                                                ->imageEditor()
                                                ->disk('public')
                                                ->required(),
                                            TextInput::make('alt')
                                                ->label('Alt text')
                                                ->required(),
                                            Select::make('alignment')
                                                ->options([
                                                    'center' => 'Center',
                                                    'right' => 'Right',
                                                    'left' => 'Left',
                                                ])
                                                ->required()
                                        ]),
                                    Forms\Components\Builder\Block::make('image_row')
                                        ->schema([
                                            FileUpload::make('urls')
                                                ->label('Row of Images')
                                                ->image()
                                                ->imageEditor()
                                                ->disk('public')
                                                ->multiple()
                                                ->required(),
                                        ]),
                                    Forms\Components\Builder\Block::make('link')
                                        ->schema([
                                            TextInput::make('url')
                                                ->label('Url Link')
                                                ->required(),
                                            TextInput::make('text')
                                                ->label('Text')
                                                ->required(),
                                            Select::make('alignment')
                                                ->options([
                                                    'center' => 'Center',
                                                    'end' => 'Right',
                                                    'start' => 'Left',
                                                ])
                                                ->required()
                                        ]),
                                ])
                        ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\ToggleColumn::make('published'),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
