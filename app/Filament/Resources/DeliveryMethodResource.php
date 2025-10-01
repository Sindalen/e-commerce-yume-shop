<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeliveryMethodResource\Pages;
use App\Filament\Resources\DeliveryMethodResource\RelationManagers;
use App\Models\DeliveryMethod;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeliveryMethodResource extends Resource
{
    protected static ?string $model = DeliveryMethod::class;
    protected static ?string $navigationGroup = 'Order';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('delivery_name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('delivery_name')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListDeliveryMethods::route('/'),
            'create' => Pages\CreateDeliveryMethod::route('/create'),
            'edit' => Pages\EditDeliveryMethod::route('/{record}/edit'),
        ];
    }
}
