@if(count($pubs) > 0)
    @foreach($pubs as $pub)
        <li class="pub-selection bg-gray-200 border-2 border-gray-300 p-4 rounded-md font-medium cursor-pointer hover:border-[#082F49] transition-all duration-300 ease-in-out" data-pub-name="{{ $pub->pub_name }}" data-pub-id="{{ $pub->pub_id }}">
            {{$pub->pub_name}}
        </li>
    @endforeach
@endif
