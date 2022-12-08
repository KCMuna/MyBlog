
  @extends('layouts.app')
  @section('content')
  <div class="flex text-black pt-10">
  <div class="m-auto pt-4 pt-4 pb-16 sm:m-auto w-4/5 block text-center">
    {{-- comment edit starts here --}} 
                
     <form action="{{ route('edit-action-comment') }}" method="post">
        @csrf
        <input type="hidden" name="criteria" value="{{ $edit->id }}">
        <textarea style="height: 80px; width:380px; border-radius:5px;" name="editcomment">{{ $edit->comment }}</textarea><br>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
  </div>
    {{-- comment edit ends here--}}
    @endsection