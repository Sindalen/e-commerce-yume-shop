<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderDetailResource\Pages;
use App\Filament\Resources\OrderDetailResource\RelationManagers;
use App\Models\OrderDetail;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderDetailResource extends Resource
{
    protected static ?string $model = OrderDetail::class;
    protected static ?string $navigationGroup = 'Order';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('customer_id')
                    ->numeric()
                    ->required(),
                TextInput::make('total_amount')
                    ->numeric()
                    ->required()
                    ->prefix('$'),
                Select::make('payment_method')
                    ->relationship('PaymentDetail', 'payment_method')
                    ->required(),
                Select::make('delivery_method')
                    ->relationship('PaymentDetail', 'delivery_name')
                    ->required(),
                TextInput::make('delivery_date')
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone_number')
                    ->required()
                    ->maxLength(255),
                TextInput::make('address')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->searchable()->sortable(),
                TextColumn::make('customer.username')->label('Customer_ID')->searchable()->sortable(),
                TextColumn::make('total_amount')->sortable(),
                TextColumn::make('payment.payment_method')->label('Payment_Method')->sortable(),
                TextColumn::make('delivery.delivery_name')->label('Payment_Detail')->sortable(),
                TextColumn::make('delivery_date')->sortable(),
                TextColumn::make('phone_number')->sortable(),
                TextColumn::make('address')->sortable(),
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
            'index' => Pages\ListOrderDetails::route('/'),
            'create' => Pages\CreateOrderDetail::route('/create'),
            'edit' => Pages\EditOrderDetail::route('/{record}/edit'),
        ];
    }
}
