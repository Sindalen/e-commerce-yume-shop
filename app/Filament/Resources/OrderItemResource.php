<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderItemResource\Pages;
use App\Filament\Resources\OrderItemResource\RelationManagers;
use App\Models\OrderItem;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderItemResource extends Resource
{
    protected static ?string $model = OrderItem::class;
    protected static ?string $navigationGroup = 'Order';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('order_id')
                    ->numeric()
                    ->required(),
                TextInput::make('product_id')
                    ->numeric()
                    ->required(),
                TextInput::make('size')
                    ->maxLength(10)
                    ->nullable(),

                TextInput::make('color')
                    ->maxLength(20)
                    ->nullable(),
                TextInput::make('quantity')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->searchable()->sortable(),
                // order is name from medel
                TextColumn::make('order.id')->label('Order_id')->sortable()->searchable(),
                TextColumn::make('Product.description')->label('Product')->sortable()->searchable(),
                TextColumn::make('size')->sortable(),
                TextColumn::make('color')->sortable(),
                TextColumn::make('quantity')->sortable(),
                TextColumn::make('date_time')->sortable(),
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
            'index' => Pages\ListOrderItems::route('/'),
            'create' => Pages\CreateOrderItem::route('/create'),
            'edit' => Pages\EditOrderItem::route('/{record}/edit'),
        ];
    }
}
