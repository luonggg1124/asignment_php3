<form  wire:submit.prevent="createNews" enctype="multipart/form-data" method="POST">
    @csrf
    <div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tiêu đề"
                   wire:model="news.title">
            @error("news.title")
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Ảnh bìa</label>
            <input class="form-control" wire:model="news.main_image" type="file" accept="image/*" id="formFile" >
            @error("news.main_image")
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
            <textarea class="form-control" wire:model="news.text" id="exampleFormControlTextarea1" rows="3"></textarea>
            @error("news.text")
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="form-select" class="form-label">Danh mục</label>
            <select class="form-select" wire:model="news.category_id" aria-label="Default select example">
                <option value="" selected>Chọn một danh mục</option>
            @foreach (\App\Models\Category::all() as $item)
                <option value="{{ $item->id }}" >{{ Str::ucfirst($item->name) }}</option>
                @endforeach
                </select>
            @error("news.category_id")
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
    </div>
    {{-- Content start --}}
    <div>
        <div class="d-flex flex-wrap grid gap-3 p-5">
            @foreach($contents as $key => $content)
                <div class="card p-3  mx-0 my-2 g-col-2">
                    <h4>Thẻ con</h4>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tiêu đề"
                               wire:model="content.{{$key}}.title" >
                        @error("content.$key.title")
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Ảnh bìa</label>
                        <input class="form-control" wire:model="content.{{$key}}.image" accept="image/*" type="file" id="formFile">
                        @error("content.$key.image")
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-4 pt-0">Image Side</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="left" wire:model="content.{{$key}}.image_side"
                                       id="gridRadios1"
                                >
                                <label class="form-check-label" for="gridRadios1">
                                    Left
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="right" wire:model="content.{{$key}}.image_side"
          i                             id="gridRadios2"
                                       >
                                <label class="form-check-label" for="gridRadios2">
                                    Right
                                </label>
                            </div>
                            @error("content.$key.side")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </fieldset>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                        <textarea class="form-control" wire:model="content.{{$key}}.content"  id="exampleFormControlTextarea1"
                                  rows="3"></textarea>

                        @error("content.$key.content")
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                </div>
            @endforeach

        </div>
        <div class="mb-3">
            <button class="btn btn-success" type="button" wire:click="addContent">Thêm thẻ +</button>
        </div>

    </div>

    <div class="d-flex justify-content-center align-items-center mt-3 p-5">
        <button class="btn btn-secondary" type="submit">Tạo tin<span>+</span></button>
    </div>
</form>
