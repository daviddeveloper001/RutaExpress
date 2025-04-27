<x-filament-widgets::widget>
    <x-filament::section>
        <div 
            x-data="{}"
            x-init="() => {
                console.log('Inicializando desde Alpine');
                
                // Función para cargar el mapa
                window.initMap = function() {
                    console.log('Función initMap ejecutada');
                    const mapElement = document.getElementById('map');
                    
                    if (mapElement) {
                        const map = new google.maps.Map(mapElement, {
                            center: { lat: 3.4516, lng: -76.5320 }, // Coordenadas de Cali
                            zoom: 12
                        });
                        
                        console.log('Mapa inicializado correctamente');
                    } else {
                        console.error('Elemento del mapa no encontrado');
                    }
                };
                
                // Cargar la API de Google Maps
                if (typeof google === 'undefined' || typeof google.maps === 'undefined') {
                    const script = document.createElement('script');
                    script.src = `https://maps.googleapis.com/maps/api/js?key={{ $apiKey }}&callback=initMap`;
                    script.async = true;
                    script.defer = true;
                    document.head.appendChild(script);
                } else {
                    // Si Google Maps ya está cargado
                    window.initMap();
                }
            }"
        >
            <div id="map" class="h-96 w-full"></div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>