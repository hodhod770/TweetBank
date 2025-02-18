<div>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <!-- Header Section -->
            <div class="border-b pb-4 mb-6">
                <h1 class="text-2xl font-bold text-gray-800">IP Address Details</h1>
                <p class="text-gray-600 font-mono">{{ $data->ip }}</p>
                <p class="text-sm text-gray-500 mt-2">HMLH ID: <span class="font-medium text-gray-700">{{ $data->hmlh_id }}</span></p>
            </div>

            <!-- Geographical Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 p-3">
                <div class="space-y-4">
                    <h2 class="text-lg font-semibold text-gray-700 mb-3 border-b pb-2">Geographical Information</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Updated Label-Value Pairs -->
                        <div class="flex flex-col space-y-1">
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Continent</span>
                            <span class="text-gray-900 font-medium">
                                {{ $data->continent ?? 'N/A' }}
                                <span class="text-gray-500 text-sm">({{ $data->continent_code ?? 'N/A' }})</span>
                            </span>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Country</span>
                            <span class="text-gray-900 font-medium">
                                {{ $data->country ?? 'N/A' }}
                                <span class="text-gray-500 text-sm">({{ $data->country_code ?? 'N/A' }})</span>
                            </span>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Region</span>
                            <span class="text-gray-900 font-medium">
                                {{ $data->region_name ?? 'N/A' }}
                                <span class="text-gray-500 text-sm">({{ $data->region ?? 'N/A' }})</span>
                            </span>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">City</span>
                            <span class="text-gray-900 font-medium">{{ $data->city ?? 'N/A' }}</span>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Postal Code</span>
                            <span class="text-gray-900 font-medium">{{ $data->zip ?? 'N/A' }}</span>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">District</span>
                            <span class="text-gray-900 font-medium">{{ $data->district ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Coordinates & Time -->
                <div class="space-y-4 p-3">
                    <h2 class="text-lg font-semibold text-gray-700 mb-3 border-b pb-2">Coordinates & Time</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col space-y-1">
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Latitude</span>
                            <span class="text-gray-900 font-mono">{{ $data->lat ?? 'N/A' }}</span>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Longitude</span>
                            <span class="text-gray-900 font-mono">{{ $data->lon ?? 'N/A' }}</span>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Timezone</span>
                            <span class="text-gray-900 font-medium">{{ $data->timezone ?? 'N/A' }}</span>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">UTC Offset</span>
                            <span class="text-gray-900 font-medium">{{ $data->offset ?? 'N/A' }}</span>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Currency</span>
                            <span class="text-gray-900 font-medium">{{ $data->currency ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Network Details -->
            <div class="border-t pt-6 mb-8 p-3">
                <h2 class="text-lg font-semibold text-gray-700 mb-4 border-b pb-2">Network Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col space-y-1">
                        <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">ISP</span>
                        <span class="text-gray-900 font-medium">{{ $data->isp ?? 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col space-y-1">
                        <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Organization</span>
                        <span class="text-gray-900 font-medium">{{ $data->org ?? 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col space-y-1">
                        <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">AS Number</span>
                        <span class="text-gray-900 font-medium">{{ $data->as ?? 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col space-y-1">
                        <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">AS Name</span>
                        <span class="text-gray-900 font-medium">{{ $data->asname ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>

            <!-- بقية الأقسام بنفس النمط -->
        </div>
    </div>
</div>