<x-admin-layout>
    <div class="container mt-4">
        <form action="{{route("admin.update",$news)}}" enctype="multipart/form-data" method="POST">
            @csrf

            <div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" value="{{ old('title',$news->title) }}" id="exampleFormControlInput1" placeholder="Tiêu đề"
                           name="news[title]">
                    @error("news.title")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Ảnh bìa</label>
                    <img src="{{asset($news->main_image)}}" class="img-fluid w-25 m-3">

                    <input class="form-control" name="news[main_image]" type="file" accept="image/*" id="formFile" >
                    @error("news.main_image")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                    <textarea class="form-control" name="news[text]" id="exampleFormControlTextarea1" rows="3">{{$news->text}}</textarea>
                    @error("news.text")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="form-select" class="form-label">Danh mục</label>
                    <select class="form-select" name="news[category_id]" aria-label="Default select example">
                        <option value="" >Chọn một danh mục</option>
                        @foreach (\App\Models\Category::all() as $item)
                            <option value="{{ $item->id }}" {{$news->category->id == $item->id ?"selected" :""}}>{{ Str::ucfirst($item->name) }}</option>
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
                    @foreach($news->contents as $key => $content)
                        <input name="content[{{$key}}][id]" type="hidden" value="{{$content->id}}">
                        <div class="card p-3  mx-0 my-2 g-col-2">
                            <h4>Thẻ con {{$key + 1}}</h4>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tiêu đề</label>
                                <input type="text" class="form-control" value="{{ $content->title }}" id="exampleFormControlInput1" placeholder="Tiêu đề"
                                       name="content[{{$key}}][title]" >
                                @error("content.$key.title")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Ảnh bìa</label>
                                <img src="{{asset($content->image)}}" class="img-fluid w-25 m-3">
                                <input class="form-control" name="content[{{$key}}][image]" accept="image/*" type="file" id="formFile">
                                @error("content.$key.image")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-4 pt-0">Image Side</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" {{$content->image_side == "left" ? "checked" : ""}} value="left" name="content[{{$key}}][side]"
                                               id="gridRadios1"
                                        >
                                        <label class="form-check-label" for="gridRadios1">
                                            Left
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="right" name="content[{{$key}}][side]"
                                               id="gridRadios2" {{$content->side == "right" ? "checked" : ""}}
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
                                <textarea class="form-control" name="content[{{$key}}][content]"  id="exampleFormControlTextarea1"
                                          rows="3">{{$content->content}}</textarea>

                                @error("content.$key.content")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                    @endforeach

                </div>


            </div>

            <div class="d-flex justify-content-center align-items-center mt-3 p-5">
                <button class="btn btn-secondary" type="submit">Sửa ngay</button>
            </div>
        </form>

    </div>
</x-admin-layout>
