<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShoppingSessionResource\Pages;
use App\Filament\Resources\ShoppingSessionResource\RelationManagers;
use App\Models\ShoppingSession;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShoppingSessionResource extends Resource
{
    protected static ?string $model = ShoppingSession::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('customer_id')->relationship('Customer', 'username')->required(),
                TextInput::make('total_cost')->numeric()->required()->prefix('$'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('Customer.username')->label('Customer')->sortable(),
                TextColumn::make('total_cost')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime()->sortable(),
                TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
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
            'index' => Pages\ListShoppingSessions::route('/'),
            'create' => Pages\CreateShoppingSession::route('/create'),
            'edit' => Pages\EditShoppingSession::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Order';
    }
}
