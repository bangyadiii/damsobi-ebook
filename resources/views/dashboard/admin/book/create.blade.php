<x-admin-layout title="Upload">
    @section('container')
        <main>
            <h1>Create New Book</h1>
            <form action="{{ Route('dashboard.books.store') }}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="merge-form d-flex gap-3 justify-content-center align-items-center ">
                    <div class="form-1">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form" required>
                        </div>

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" id="author" name="author" class="form" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Kategori:</label>
                            <select id="category" name="category_id" class="form" required>
                                <option value="" selected disabled>Pilih kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>"
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <div class="drop-zone">
                                <span class="drop-zone__prompt">Drag File Here or Click to Upload PDF File</span>
                                <input type="file" name="book_url" id="image" accept="application/pdf" required>
                                @error('book_url')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="synopsis">Sinopsis</label>
                            <textarea id="synopsis" name="sinopsis" class="form" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="form-2 mt-5">
                        <div class="form-group">
                            <div class="drop-zone cover">
                                <span class="drop-zone__prompt">Drag File Here or Click to Upload Cover Image</span>
                                <input type="file" name="cover_url" id="image" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn create">Submit</button>
            </form>

        </main>
        <div class="right">
            @include('dashboard.admin.layouts.header')
        </div>
    @endsection
</x-admin-layout>
