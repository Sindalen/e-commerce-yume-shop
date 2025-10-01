<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\OrderDetail;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;

class RecentTransactions extends BaseWidget
{
    protected static ?int $sort = 2; // show below revenue widget
    protected int|string|array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return OrderDetail::latest()->limit(7); // Adjust as needed
    }

    protected function getTableColumns(): array
    {
        return [
            ImageColumn::make('customer.user_avatar')->searchable()->sortable(),

            TextColumn::make('customer.username') // Adjust relation if needed
                ->label('Name of user')
                ->sortable(),

            TextColumn::make('created_at')
                ->date('d M Y, H:i')
                ->label('Date & Time')
                ->sortable(),


            TextColumn::make('total_amount')
                ->label('Total')
                ->money('usd'),

            BadgeColumn::make('status') // Adjust field name
                ->colors([
                    'success' => 'paid',
                    'warning' => 'pending',
                    'danger' => 'returned',
                ])
                ->label('Status'),
            
        ];
        
    }
}
