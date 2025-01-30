<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cpf')
                    ->maxLength(255)
                    ->default(null)
                    ->mask('999.999.999-99'),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('cnpj')
                    ->maxLength(255)
                    ->default(null)
                    ->mask('99.999.999/9999-99'),
                Forms\Components\Select::make('company_type')
                    ->default(null)
                    ->options([
                        \App\Models\Restaurante::class => 'Restaurante',
                        \App\Models\Transportadora::class => 'Transportadora',
                        \App\Models\MeioDeHospedagem::class => 'Meio de Hospedagem',
                        \App\Models\CentroDeConvencoes::class => 'Centro de Convenções',
                        \App\Models\AgenciasDeTurismo::class => 'Agência de Turismo',
                        \App\Models\ParqueAquaticoEEmpreendimentoDeLazer::class => 'Parque Aquático e Empreendimento de Lazer',
                        \App\Models\ParqueTematico::class => 'Parque Temática',
                        \App\Models\LocadoraDeVeiculosParaTuristas::class => 'Locadora de Veículos Para Turista',
                        \App\Models\AcampamentoTuristico::class => 'Acampamento',
                        \App\Models\CasaDeEspetaculos::class => 'Casa de Espetáculos',
                        \App\Models\OrganizadoraDeEventos::class => 'Organizadora de Eventos',
                        \App\Models\TurismoNautico::class => 'Turismo Náutico',
                    ])
                    ->live(),
                Forms\Components\Select::make('company_id')
                    ->default(null)
                    ->options(
                        function (Get $get) {
                            $model_name = $get('company_type');
                            return $model_name::pluck('nome_fantasia', 'id');
                        }

                    ),
                Forms\Components\Toggle::make('admin')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cpf')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('provider')
                    ->searchable(),
                Tables\Columns\TextColumn::make('provider_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cnpj')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('admin')
                    ->boolean(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
