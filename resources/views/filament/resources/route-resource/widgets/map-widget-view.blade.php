<x-filament-widgets::widget>
    <x-filament::section>
        <div wire:ignore>
    <div id="map" class="h-96 w-full"></div>
    <script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 3.4516, lng: -76.5320 }, // Coordenadas de Cali
                zoom: 12
            });
        }
    </script>
    
    <script async defer 
        src="https://maps.googleapis.com/maps/api/js?key={{ $apiKey }}&callback=initMap">
    </script>
</div>
    </x-filament::section>
</x-filament-widgets::widget>
