<div>

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b">
                <select wire:model.live='h_id' style="width:min-content" name="" id="" class="form-select">
                    <option value="0">كل الحملات</option>
                    @foreach ($hm as $item)
                        <option value="{{ $item->uid }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <a href="{{route('Reports1',['id'=>$h_id])}}" class="btn btn-primary m-2">طباعة تقرير</a>
                <h1 class="text-2xl font-bold text-gray-800">قائمة عناوين IP</h1>
                <p class="text-gray-600 mt-1">إجمالي السجلات: {{ $ips->total() }}</p>
            </div>
    
            @if ($ips->isEmpty())
                <div class="p-6 text-gray-500">لا توجد سجلات متاحة</div>
            @else
                <div class="overflow-x-auto">
                    <table class="table min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">IP</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">البلد</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">المدينة</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">مزود الخدمة</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">جوال</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">بروكسي</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">تاريخ الإضافة</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($ips as $ip)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $ip->ip }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if($ip->country_code)
                                        <span class="fi fi-{{ strtolower($ip->country_code) }}"></span>
                                        {{ $ip->country }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $ip->city ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $ip->isp ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                    @if($ip->mobile)
                                        <span class="text-green-500">✓</span>
                                    @else
                                        <span class="text-red-500">✗</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                    @if($ip->proxy)
                                        <span class="text-green-500">✓</span>
                                    @else
                                        <span class="text-red-500">✗</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $ip->created_at->format('Y-m-d') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('Showvist', $ip->id) }} " class="text-indigo-600 hover:text-indigo-900">عرض التفاصيل</a>
                                    {{-- --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
    
                <div class="px-6 py-4 border-t">
                    {{ $ips->links() }}
                </div>
            @endif
        </div>
    </div>
   
</div>

{{-- 
   
--}}