<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Filament\Resources\ProgramResource\RelationManagers;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BadgeColumn;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

public static function form(Form $form): Form
{
    return $form
        ->schema([
            Section::make('Informasi Utama')
                ->description('Detail nama dan jenis lembaga pendidikan.')
                ->schema([
                    TextInput::make('name')
                        ->label('Nama Program/Lembaga')
                        ->required()
                        ->placeholder('Contoh: Madrasah Diniyah Al-Istiqomah'),

                    Select::make('type')
                        ->label('Jenis Program')
                        ->options([
                            'ponpes' => 'Pondok Pesantren',
                            'madin' => 'Madrasah Diniyah',
                            'tpq' => 'TPQ',
                        ])
                        ->required(),

                    TextInput::make('head_of_institution')
                        ->label('Kepala Lembaga')
                        ->required(),
                ])->columns(2),

            Section::make('Detail Kegiatan')
                ->schema([
                    RichEditor::make('description')
                        ->label('Profil/Deskripsi')
                        ->required(),

                    RichEditor::make('study_schedule')
                        ->label('Jadwal Belajar')
                        ->required(),

                    FileUpload::make('image')
                        ->label('Foto Lembaga')
                        ->image()
                        ->directory('programs'),
                ]),
        ]);
}

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            // Menampilkan foto kecil lembaga
            ImageColumn::make('image')
                ->label('Foto')
                ->circular(), // Membuat foto jadi bulat agar estetik 🖼️

            TextColumn::make('name')
                ->label('Nama Lembaga')
                ->searchable() // Agar bisa dicari berdasarkan nama
                ->sortable(),

            // Menampilkan jenis dengan warna-warni (Badge)
            TextColumn::make('type')
                ->label('Jenis')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'ponpes' => 'success', // Hijau
                    'madin' => 'warning',  // Kuning/Oranye
                    'tpq' => 'info',       // Biru
                    default => 'gray',
                }),

            TextColumn::make('head_of_institution')
                ->label('Kepala Lembaga')
                ->icon('heroicon-m-user'), // Menambah ikon user 👤

            TextColumn::make('created_at')
                ->label('Dibuat Pada')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->filters([
            // Kita bisa tambah filter berdasarkan jenis nanti
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
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
