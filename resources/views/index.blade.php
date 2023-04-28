@extends('layouts.main')
@section('main-section')

    @push('title')
        <title>Fetival India</title>
    @endpush

  <div class="py-10">
    <h2 id="festivalSelected" class="text-3xl font-bold text-center">Select Festival</h2>
    <header>
      <div class="flex justify-center">
        <div class="sm:hidden">
          <label for="tabs" class="sr-only">Select a tab</label>
        </div>
        <div >
          <nav class="flex flex-row flex-wrap p-2" aria-label="Tabs">
            <!-- Current: "bg-indigo-100 text-indigo-700", Default: "text-gray-500 hover:text-gray-700" -->
            <a id="Pongal" class="festivalBtn text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md" style="cursor:pointer;"> Pongal </a>

            <a id="Maha Shivaratri" class="festivalBtn text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md" style="cursor:pointer;"> Maha Shivaratri </a>

            <a id="Holi" class="festivalBtn text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md" style="cursor:pointer;" aria-current="page"> Holi </a>

            <a id="Eid" class="festivalBtn text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md" style="cursor:pointer;"> Eid </a>

            <a id="Ganesh Chaturthi" class="festivalBtn text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md" style="cursor:pointer;"> Ganesh Chaturthi </a>

            <a id="Navratri" class="festivalBtn text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md" style="cursor:pointer;"> Navaratri </a>

            <a id="Dussehra" class="festivalBtn  text-gray-500 hover:text-gray-700px-3 py-2 font-medium text-sm rounded-md" style="cursor:pointer;" aria-current="page"> Dusshera </a>

            <a id="Diwali" class="festivalBtn text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md" style="cursor:pointer;"> Diwali </a>

            <a id="Christmas" class="festivalBtn text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md" style="cursor:pointer;"> Christmas </a>
          </nav>
        </div>
      </div>
    </header>
    <main>
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="px-4 py-8 sm:px-0">
          <div class="my-2 border-4 border-dashed border-gray-200 rounded-lg h-96">
            <div class="m-4 text-lg " id="contentArea" style="overflow-y:scroll; height:100%;">
              Click any above festival.
            </div>
          </div>
          <div class="my-2 border-4 border-dashed border-gray-200 rounded-lg h-96">
            <div class="grid p-2 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4" id="imageArea">
              
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<script>

   function debounce(func, wait, immediate) {
      var timeout;
      return function() {
          var context = this, args = arguments;
          var later = function() {
              timeout = null;
              if (!immediate) func.apply(context, args);
          };
          var callNow = immediate && !timeout;
          clearTimeout(timeout);
          timeout = setTimeout(later, wait);
          if (callNow) func.apply(context, args);
      };  
    };
    
$(document).ready(function(){
  $(document).on("click", ".festivalBtn", debounce(function(e){
    let festival = e.target.getAttribute("id");
    let heading = document.getElementById("festivalSelected").innerHTML = festival;
    let contentArea = document.getElementById("contentArea");
    contentArea.innerHTML = `<h3 class='text-2xl m-4'>Fetching ${festival}...</h3>`
    $.ajax({
      url: "{{route('fetchFestival')}}",
      type: 'POST',
      data:{
        '_token': "{{csrf_token()}}",
        'festival' : festival
      },
      success: function(res){
        res = JSON.parse(res);
        contentArea.innerHTML = res.choices[0].message.content;
      }
    })

    $.ajax({
      url: "{{route('fetchFestivalImage')}}",
      type: 'POST',
      data:{
        '_token': "{{csrf_token()}}",
        'festival' : festival
      },
      success: function(res){
        res = JSON.parse(res);
        let contentArea = document.getElementById("imageArea");
        
        let html = '';
        for (let i = 0; i < res.data.length; i++) {
          const element = res.data[i];
          html += `<img src='${element.url}' class='rounded-lg ma-2'/>`
        }
        contentArea.innerHTML = html;
      }
    })
  }, 10000));
})
</script>
@endsection