@extends('layouts.admin')

@section('title', 'Edit Agenda Event')

@section('content')
<div class="space-y-6 max-w-4xl mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">
                <a href="{{ route('admin.event.index') }}" class="hover:text-blue-600 transition-colors">Event & Agenda</a>
                <span>/</span>
                <span>Edit</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Edit Agenda Event</h1>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('event.show', $event->slug) }}" target="_blank" class="px-3.5 py-2 text-sm font-semibold text-blue-600 hover:text-blue-700 bg-blue-50 border border-blue-100 rounded-xl hover:bg-blue-100/70 transition-colors">
                Lihat di Web
            </a>
            <a href="{{ route('admin.event.index') }}" class="px-3.5 py-2 text-sm font-semibold text-slate-600 hover:text-slate-900 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors">
                Kembali
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-sm">
            <div class="font-semibold mb-1">Harap periksa kesalahan berikut:</div>
            <ul class="list-disc list-inside space-y-0.5 text-xs text-rose-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.event.update', $event) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 sm:p-6 shadow-sm space-y-5">
            <!-- Judul Event -->
            <div>
                <label for="title" class="block text-sm font-semibold text-slate-800 mb-1.5">
                    Nama Event / Kegiatan <span class="text-rose-500">*</span>
                </label>
                <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all">
                @error('title') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Tanggal, Waktu Mulai & Waktu Selesai -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label for="event_date" class="block text-sm font-semibold text-slate-800 mb-1.5">
                        Tanggal Acara <span class="text-rose-500">*</span>
                    </label>
                    <input type="date" name="event_date" id="event_date" value="{{ old('event_date', $event->event_date ? $event->event_date->format('Y-m-d') : '') }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all">
                    @error('event_date') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="start_time" class="block text-sm font-semibold text-slate-800 mb-1.5">
                        Jam Mulai <span class="text-rose-500">*</span>
                    </label>
                    <input type="time" name="start_time" id="start_time" value="{{ old('start_time', substr($event->start_time, 0, 5)) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all">
                    @error('start_time') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="end_time" class="block text-sm font-semibold text-slate-800 mb-1.5">
                        Jam Selesai <span class="text-xs text-slate-400 font-normal">(Opsional)</span>
                    </label>
                    <input type="time" name="end_time" id="end_time" value="{{ old('end_time', $event->end_time ? substr($event->end_time, 0, 5) : '') }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all">
                    @error('end_time') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Lokasi & Penanggung Jawab -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="location" class="block text-sm font-semibold text-slate-800 mb-1.5">
                        Lokasi / Tempat Acara <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="location" id="location" value="{{ old('location', $event->location) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all">
                    @error('location') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="person_in_charge" class="block text-sm font-semibold text-slate-800 mb-1.5">
                        Penanggung Jawab / Kontak PIC <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="person_in_charge" id="person_in_charge" value="{{ old('person_in_charge', $event->person_in_charge) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all">
                    @error('person_in_charge') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Status Event -->
            <div>
                <label for="status" class="block text-sm font-semibold text-slate-800 mb-1.5">
                    Status Agenda <span class="text-rose-500">*</span>
                </label>
                <select name="status" id="status" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all text-slate-700">
                    <option value="upcoming" {{ old('status', $event->status) === 'upcoming' ? 'selected' : '' }}>Akan Datang (Upcoming - Tampil di Countdown)</option>
                    <option value="ongoing" {{ old('status', $event->status) === 'ongoing' ? 'selected' : '' }}>Sedang Berlangsung (Ongoing)</option>
                    <option value="finished" {{ old('status', $event->status) === 'finished' ? 'selected' : '' }}>Selesai (Finished)</option>
                </select>
                @error('status') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Upload Poster Gambar -->
            <div>
                <label class="block text-sm font-semibold text-slate-800 mb-1.5">
                    Poster / Banner Event <span class="text-xs text-slate-400 font-normal">(Kosongkan jika tidak ingin mengubah)</span>
                </label>
                
                @if($event->image)
                    <div class="mb-3 p-3 rounded-2xl bg-slate-50 border border-slate-200 flex items-center gap-4">
                        <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="w-20 h-20 object-cover rounded-xl border border-slate-200">
                        <div>
                            <span class="text-xs font-semibold text-slate-700 block">Poster Saat Ini</span>
                            <span class="text-xs text-slate-400 block mt-0.5">Unggah berkas baru di bawah jika ingin menggantinya.</span>
                        </div>
                    </div>
                @endif

                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-2xl hover:border-blue-400 transition-colors bg-slate-50/50">
                    <div class="space-y-2 text-center">
                        <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-slate-600 justify-center">
                            <label for="image" class="relative cursor-pointer bg-white rounded-lg px-3 py-1 font-semibold text-blue-600 hover:text-blue-500 focus-within:outline-none shadow-sm border border-slate-200">
                                <span>Ganti Berkas Poster</span>
                                <input id="image" name="image" type="file" accept="image/*" data-preview-target="event-preview-box" class="sr-only">
                            </label>
                        </div>
                        <p class="text-xs text-slate-500">PNG, JPG, JPEG, WEBP, atau SVG hingga 3MB</p>
                    </div>
                </div>

                <!-- Preview Box -->
                <div id="event-preview-box" class="hidden mt-4 p-3 rounded-2xl bg-slate-50 border border-slate-200">
                    <div class="text-xs font-semibold text-slate-500 mb-2">Pratinjau Poster Baru:</div>
                    <img src="" alt="Pratinjau" class="w-full max-h-64 object-cover rounded-xl border border-slate-200">
                </div>
                @error('image') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Deskripsi Event -->
            <div>
                <label for="description" class="block text-sm font-semibold text-slate-800 mb-1.5">
                    Deskripsi & Agenda Lengkap <span class="text-rose-500">*</span>
                </label>
                <textarea name="description" id="description" rows="8" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all leading-relaxed">{{ old('description', $event->description) }}</textarea>
                @error('description') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.event.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-sm font-semibold text-slate-600 hover:bg-slate-50 transition-colors">
                Batalkan
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold shadow-sm shadow-blue-600/30 transition-all hover:shadow-md">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
