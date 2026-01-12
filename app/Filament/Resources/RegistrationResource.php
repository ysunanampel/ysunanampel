<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Registration;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RegistrationResource\Pages;
use App\Filament\Resources\RegistrationResource\RelationManagers;

class RegistrationResource extends Resource
{
    protected static ?string $model = Registration::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

   public static function form(Form $form): Form
{
    return $form
        ->schema([
            Section::make('Data Pribadi Santri')
                ->description('Informasi dasar calon santri.')
                ->schema([
                    TextInput::make('student_name')
                        ->label('Nama Lengkap')
                        ->required(),
                    
                    TextInput::make('nik')
                        ->label('NIK')
                        ->numeric()
                        ->required()
                        ->unique(ignoreRecord: true), // Supaya NIK tidak ganda

                    Select::make('gender')
                        ->label('Jenis Kelamin')
                        ->options([
                            'L' => 'Laki-laki',
                            'P' => 'Perempuan',
                        ])
                        ->required(),

                    DatePicker::make('birth_date')
                        ->label('Tanggal Lahir')
                        ->required(),
                ])->columns(2),

            Section::make('Kontak & Program')
                ->schema([
                    TextInput::make('parent_name')
                        ->label('Nama Wali/Orang Tua')
                        ->required(),

                    Textarea::make('address')
                        ->label('Alamat Lengkap')
                        ->required(),

                    Select::make('program_type')
                        ->label('Pilihan Program')
                        ->options([
                            'ponpes' => 'Pondok Pesantren',
                            'madin' => 'Madrasah Diniyah',
                            'tpq' => 'TPQ',
                        ])
                        ->required(),

                    Select::make('status')
                        ->label('Status Pendaftaran')
                        ->options([
                            'pending' => 'Menunggu',
                            'approved' => 'Diterima',
                            'rejected' => 'Ditolak',
                        ])
                        ->default('pending')
                        ->required(),
                ]),
        ]);
}

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('student_name')
                ->label('Nama Santri')
                ->searchable()
                ->sortable(),

            TextColumn::make('nik')
                ->label('NIK')
                ->copyable() // Biar admin bisa copas NIK dengan sekali klik
                ->searchable(),

            TextColumn::make('program_type')
                ->label('Program')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'ponpes' => 'success',
                    'madin' => 'warning',
                    'tpq' => 'info',
                    default => 'gray',
                }),

            TextColumn::make('status')
                ->label('Status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'approved' => 'success',
                    'rejected' => 'danger',
                    default => 'gray',
                }),

            TextColumn::make('created_at')
                ->label('Tgl Daftar')
                ->dateTime()
                ->sortable(),
        ])
        ->filters([
            // Kita tambahkan filter program agar admin bisa pilih kategori
            Tables\Filters\SelectFilter::make('program_type')
                ->label('Filter Program')
                ->options([
                    'ponpes' => 'Pondok Pesantren',
                    'madin' => 'Madrasah Diniyah',
                    'tpq' => 'TPQ',
                ]),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListRegistrations::route('/'),
            'create' => Pages\CreateRegistration::route('/create'),
            'edit' => Pages\EditRegistration::route('/{record}/edit'),
        ];
    }
}
