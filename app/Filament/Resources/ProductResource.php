<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;



class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'المنتجات';
    protected static ?string $pluralModelLabel = 'المنتجات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('اسم المنتج'),

                TextInput::make('price')
                    ->required()
                    ->label('السعر'),

                TextInput::make('description')
                    ->required()
                    ->label('الوصف'),

                Select::make('category_id')
                    ->label('الصنف')
                    ->relationship('category', 'type')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('type')->required()->label('اسم الصنف'),
                    ])
                    ->required(),

                Select::make('product_variant_id')
                    ->label('حجم الصنف')
                    ->relationship('variant', 'measure')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('measure')->required()->label('حجم الصنف'),
                    ])
                    ->required(),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('اسم المنتج')
                    ->searchable(),

                TextColumn::make('price')
                    ->label('السعر')
                    ->searchable(),

                TextColumn::make('description')
                    ->label('الوصف')
                    ->searchable(),

                TextColumn::make('category.type')
                    ->label('الصنف')
                    ->searchable(),

                TextColumn::make('variant.measure')
                    ->label('حجم الصنف')
                    ->searchable(),
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            RelationManagers\CategoryRelationManager::class,
            RelationManagers\VariantRelationManager::class
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
