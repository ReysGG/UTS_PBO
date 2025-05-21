<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FacultyResource\Pages;
use App\Filament\Admin\Resources\FacultyResource\RelationManagers;
use App\Models\Faculty;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FacultyResource extends Resource
{
    protected static ?string $model = Faculty::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nama Fakultas')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('code')
                ->label('Kode')
                ->maxLength(10),

            Forms\Components\Textarea::make('description')
                ->label('Deskripsi'),

            Forms\Components\TextInput::make('dean_name')
                ->label('Nama Dekan')
                ->maxLength(255),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email(),

            Forms\Components\TextInput::make('phone')
                ->label('No. Telepon'),

            Forms\Components\TextInput::make('website')
                ->label('Website')
                ->url(),

            Forms\Components\TextInput::make('address')
                ->label('Alamat'),

            Forms\Components\TextInput::make('building')
                ->label('Gedung'),
        ]);
}


public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')
                ->label('Nama')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('code')
                ->label('Kode')
                ->sortable(),

            Tables\Columns\TextColumn::make('dean_name')
                ->label('Dekan'),

            Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->limit(30),

            Tables\Columns\TextColumn::make('building')
                ->label('Gedung'),
        ])
        ->filters([])
        ->actions([
            Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListFaculties::route('/'),
            'create' => Pages\CreateFaculty::route('/create'),
            'edit' => Pages\EditFaculty::route('/{record}/edit'),
        ];
    }
}
