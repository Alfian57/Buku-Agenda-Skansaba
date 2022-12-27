<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OutgoingMailResource\Pages;
use App\Filament\Resources\OutgoingMailResource\RelationManagers;
use App\Models\Category;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Models\OutgoingMail;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OutgoingMailResource extends Resource
{
    protected static ?string $model = OutgoingMail::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Mails Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('user_id')
                        ->default(auth()->user()->id)
                        ->disabled(),
                    Select::make('category_id')
                        ->label('Kategori')
                        ->required()
                        ->options(Category::all()->pluck('name', 'id')),
                    DatePicker::make('tanggal_surat')
                        ->required(),
                    TextInput::make('no_surat')
                        ->unique(fn (Page $livewire): bool => $livewire instanceof CreateRecord)
                        ->required()
                        ->maxLength(255),
                    TextInput::make('tujuan')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('perihal')
                        ->required()
                        ->maxLength(255),
                    Textarea::make('keterangan')
                        ->required()
                        ->maxLength(65535),
                    SpatieMediaLibraryFileUpload::make('file')
                        ->collection('outgoing_mails')
                        ->image()
                        ->responsiveImages()
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('category.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tanggal_surat')
                    ->date()
                    ->sortable(),
                TextColumn::make('no_surat')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tujuan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('perihal')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('keterangan'),
                SpatieMediaLibraryImageColumn::make('file')
                    ->collection('outgoing_mails'),
            ])
            ->filters([
                SelectFilter::make('user_id')
                    ->label('User')
                    ->options(User::all()->pluck('name', 'id')),
                SelectFilter::make('category_id')
                    ->label('Category')
                    ->options(Category::all()->pluck('name', 'id'))
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
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
            'index' => Pages\ListOutgoingMails::route('/'),
            'create' => Pages\CreateOutgoingMail::route('/create'),
            'edit' => Pages\EditOutgoingMail::route('/{record}/edit'),
        ];
    }
}