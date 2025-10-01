<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentDetailResource\Pages;
use App\Filament\Resources\PaymentDetailResource\RelationManagers;
use App\Models\PaymentDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentDetailResource extends Resource
{
    protected static ?string $model = PaymentDetail::class;
    protected static ?string $navigationGroup = 'Order';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('order_id')->numeric(),
                TextInput::make('amount')->numeric()->prefix('$'),
                TextInput::make('payment_method')->required()->maxLength(225),
                // TextInput::make('delivery_name')->required()->maxLength(225),
                Select::make('status')
                    ->options([
                        'Pending' => 'Pending',
                        'Success' => 'Success',
                        'Failed' => 'Failed',
                        'Refunded' => 'Refunded',
                        'Canceled' => 'Canceled',
                    ])
                    ->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->searchable()->sortable(),
                TextColumn::make('order_id')->sortable(),
                TextColumn::make('amount')->searchable()->sortable(),
                TextColumn::make('payment_method')->searchable()->sortable(),
                // TextColumn::make('delivery_name')->searchable()->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Pending' => 'gray',
                        'Success' => 'success',
                        'Failed' => 'danger',
                        'Refunded' => 'info',
                        'Canceled' => 'warning',
                        default => 'gray',
                    })
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
            'index' => Pages\ListPaymentDetails::route('/'),
            'create' => Pages\CreatePaymentDetail::route('/create'),
            'edit' => Pages\EditPaymentDetail::route('/{record}/edit'),
        ];
    }
}
