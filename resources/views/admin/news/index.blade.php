<x-admin-layout>
    <div class="container mt-4">
      <div class="my-2 d-flex justify-content-end">
        <a href="{{ route('admin.create') }}" class="btn btn-success">Thêm <span class="fs-5">+</span></a>
      </div>
        <table class="table border rounded-3 table-bordered border-primary table-striped ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Ảnh bìa</th>
                <th scope="col">Chú thích</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Người tạo</th>

                <th scope="col">Chức năng</th>
              </tr>
            </thead>
            <tbody class="border-separate">
              @foreach ($news as $item)
              <tr>
                <th scope="row">{{ $item->id }}</th>
                <td class="text-break"><a href="{{route("pages.single",$item)}}">{{ $item->title }}</a></td>
                <td><img src="{{ asset("$item->main_image") }}" class="img-fluid" style="max-width: 180px" alt=""></td>
                <td class="text-break">{{ $item->text }}</td>
                <td><a href="" class="link-offset-1">{{ Str::ucfirst($item->category->name) }}</a></td>
                <td>{{ $item->user->email }}</td>
                <td>

                    <a href="{{ route("admin.edit",$item) }}" class="btn btn-dark m-1">Sửa</a>
                    <form action="{{ route("admin.delete",$item) }}" method="POST" class="m-1">
                        @csrf

                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
              </tr>
              @endforeach



            </tbody>
          </table>
          <div class="d-flex justify-content-center align-items-center">
              {{ $news->links() }}
          </div>
    </div>
</x-admin-layout>
