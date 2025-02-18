<div>
    <div class="container mx-auto px-4 py-8 ">
        <div class="bg-white rounded-lg shadow-md p-6">
            <!-- Header Section -->
            <div class="border-b pb-4 mb-6">
                <h1 class="text-2xl font-bold text-gray-800">IP Address Details</h1>
                <p class="text-gray-600">{{ $data->ip }}</p>
                <p class="text-sm text-gray-500 mt-2">HMLH ID: {{ $data->hmlh_id }}</p>
            </div>
    
            <!-- Geographical Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 p-3">
                <div class="space-y-2">
                    <h2 class="text-lg font-semibold text-gray-700 mb-3">Geographical Information</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Continent</p>
                            <p class="text-gray-700">{{ $data->continent ?? 'N/A' }} ({{ $data->continent_code ?? 'N/A' }})</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Country</p>
                            <p class="text-gray-700">{{ $data->country ?? 'N/A' }} ({{ $data->country_code ?? 'N/A' }})</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Region</p>
                            <p class="text-gray-700">{{ $data->region_name ?? 'N/A' }} ({{ $data->region ?? 'N/A' }})</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">City</p>
                            <p class="text-gray-700">{{ $data->city ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Postal Code</p>
                            <p class="text-gray-700">{{ $data->zip ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">District</p>
                            <p class="text-gray-700">{{ $data->district ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
    
                <!-- Coordinates & Time -->
                <div class="space-y-2 p-3" >
                    <h2 class="text-lg font-semibold text-gray-700 mb-3">Coordinates & Time</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Latitude</p>
                            <p class="text-gray-700">{{ $data->lat ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Longitude</p>
                            <p class="text-gray-700">{{ $data->lon ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Timezone</p>
                            <p class="text-gray-700">{{ $data->timezone ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">UTC Offset</p>
                            <p class="text-gray-700">{{ $data->offset ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Currency</p>
                            <p class="text-gray-700">{{ $data->currency ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Network Details -->
            <div class="border-t pt-6 mb-8 p-3">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Network Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-500">ISP</p>
                        <p class="text-gray-700">{{ $data->isp ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Organization</p>
                        <p class="text-gray-700">{{ $data->org ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">AS Number</p>
                        <p class="text-gray-700">{{ $data->as ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">AS Name</p>
                        <p class="text-gray-700">{{ $data->asname ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
    
            <!-- Status Indicators -->
            <div class="border-t pt-6 mb-8 p-3">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Status Indicators</h2>
                <div class="flex space-x-4">
                    <div class="flex items-center">
                        <span class="inline-block w-2 h-2 rounded-full {{ $data->mobile ? 'bg-green-500' : 'bg-red-500' }}"></span>
                        <span class="ml-2 text-sm {{ $data->mobile ? 'text-green-700' : 'text-red-700' }}">Mobile Connection</span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-2 h-2 rounded-full {{ $data->proxy ? 'bg-green-500' : 'bg-red-500' }}"></span>
                        <span class="ml-2 text-sm {{ $data->proxy ? 'text-green-700' : 'text-red-700' }}">Proxy/VPN</span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-2 h-2 rounded-full {{ $data->hosting ? 'bg-green-500' : 'bg-red-500' }}"></span>
                        <span class="ml-2 text-sm {{ $data->hosting ? 'text-green-700' : 'text-red-700' }}">Hosting Provider</span>
                    </div>
                </div>
            </div>
    
            <!-- Timestamps -->
            <div class="border-t pt-6 text-sm text-gray-500">
                <div class="flex justify-between">
                    <p>Created: {{ $data->created_at->format('M d, Y H:i') }}</p>
                    <p>Last Updated: {{ $data->updated_at->format('M d, Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
