<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductVariationResource\Pages;
use App\Filament\Resources\ProductVariationResource\RelationManagers;
use App\Models\ProductVariation;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\select;

class ProductVariationResource extends Resource
{
    protected static ?string $model = ProductVariation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('product_id')
                    ->relationship('Product', 'description')
                    ->required(),
                    // ->sortable(),
                TextInput::make('size')
                    ->maxLength(10)
                    ->nullable(),

                TextInput::make('color')
                    ->maxLength(20)
                    ->nullable(),

                TextInput::make('code')
                    ->unique(ignoreRecord: true),
                    
                Toggle::make('in_stock')
                ->label('In Stock?')
                ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Product.description')->label('Product')->sortable(),
                TextColumn::make('size')->sortable(),
                TextColumn::make('color')->sortable(),
                TextColumn::make('code')->sortable(),
                TextColumn::make('created_at')->dateTime()->label('Created At'),
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
            'index' => Pages\ListProductVariations::route('/'),
            'create' => Pages\CreateProductVariation::route('/create'),
            'edit' => Pages\EditProductVariation::route('/{record}/edit'),
        ];
    }

    

}
