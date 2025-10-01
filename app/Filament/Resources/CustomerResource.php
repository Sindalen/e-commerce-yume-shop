<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('username')->required()->unique(),
                TextInput::make('email')->email()->required()->unique(),
                TextInput::make('password')->password()->required(),
                TextInput::make('phone_number')->tel(),
                Select::make('gender_id')->relationship('gender', 'name')->required(),
                Select::make('province_id')->relationship('province', 'name')->required(),
                FileUpload::make('user_avatar')->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->searchable()->sortable(),
                ImageColumn::make('user_avatar')->searchable()->sortable(),
                TextColumn::make('phone_number')->searchable(),
                TextColumn::make('email')->searchable(),
                // TextColumn::make('password')->searchable(),
                TextColumn::make('gender.name')->label('Gender')->sortable(),
                TextColumn::make('province.name')->label('Province')->sortable(),
                // TextColumn::make('created_by')->sortable(),
                // TextColumn::make('updated_by')->sortable(),  
                TextColumn::make('created_at')->dateTime()->sortable(),      
                TextColumn::make('updated_at')->dateTime()->sortable(),  
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
                ])
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Customer';
    }
}
