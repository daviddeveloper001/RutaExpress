<div wire:ignore 
     x-data="{
        init() {
            const map = new google.maps.Map(this.$refs.map, {
                center: { lat: {{ $config['center']['lat'] }}, lng: {{ $config['center']['lng'] }} },
                zoom: {{ $config['zoom'] }}
            });
            @foreach($config['markers'] as $marker)
                new google.maps.Marker({
                    position: { lat: {{ $marker['position']['lat'] }}, lng: {{ $marker['position']['lng'] }} },
                    map: map,
                    title: '{{ $marker['title'] }}'
                });
            @endforeach
        }
     }">
    <div x-ref="map" class="w-full h-96"></div>
</div>