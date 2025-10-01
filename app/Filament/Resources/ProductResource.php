<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('description')
                    ->nullable()
                    ->maxLength(2000),
                TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->prefix('$'),
                Select::make('product_category_id')
                    ->relationship('ProductCategory', 'name')
                    ->required(),
                    // ->sortable(),
                Select::make('discount_id')
                    ->relationship('Discount', 'discount_name')
                    ->nullable(),
                    // ->sortable(),

                FileUpload::make('image')->image(),

                Toggle::make('in_stock')
                ->label('In Stock?')
                ->default(true),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('description')->sortable()->searchable(),
                ImageColumn::make('image')->searchable()->sortable(),
                TextColumn::make('price')->sortable()->searchable()->money('USD'),
                TextColumn::make('ProductCategory.name')->label('Category')->sortable(),
                TextColumn::make('Discount.discount_name')->label('Discount')->sortable(),
                // TextColumn::make('created_by.name')->sortable(),
                // TextColumn::make('updated_by')->sortable(),
                TextColumn::make('created_at')->dateTime()->sortable(),
                TextColumn::make('updated_at')->dateTime()->sortable(),
                TextColumn::make('in_stock')
                    ->label('Stock Status')
                    ->sortable()
                    ->badge()
                    ->color(fn($state) => $state ? 'success' : 'danger')
                    ->formatStateUsing(fn($state) => $state ? 'In Stock' : 'Out of Stock'),
                 
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
    

}
