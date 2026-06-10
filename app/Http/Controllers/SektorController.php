<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SektorController extends Controller
{
    public function semuaSektor()
    {
        $sectors = collect([

            [
                'name' => 'Mitigasi Geobencana',
                'category' => 'geoteknik',
                'icon' => 'fa-mountain',
                'badge' => 'Geoteknik',
                'badgeColor' => 'bg-red-700',
                'description' => 'Analisis longsor, slope stability, dan mitigasi bencana geologi.'
            ],

            [
                'name' => 'Rekayasa Bawah Tanah',
                'category' => 'geoteknik',
                'icon' => 'fa-person-digging',
                'badge' => 'Underground',
                'badgeColor' => 'bg-slate-700',
                'description' => 'Tunnel engineering dan deep excavation.'
            ],

            [
                'name' => 'Pembangkit Energi',
                'category' => 'energi',
                'icon' => 'fa-bolt',
                'badge' => 'Energi',
                'badgeColor' => 'bg-yellow-600',
                'description' => 'Assessment pondasi dan fasilitas energi.'
            ],

            [
                'name' => 'Infrastruktur & Transportasi',
                'category' => 'transportasi',
                'icon' => 'fa-road',
                'badge' => 'Transportasi',
                'badgeColor' => 'bg-blue-700',
                'description' => 'Rekayasa transportasi dan infrastruktur modern.'
            ],

            [
                'name' => 'Infrastruktur Jalan',
                'category' => 'infrastruktur',
                'icon' => 'fa-road-circle-check',
                'badge' => 'Infrastruktur',
                'badgeColor' => 'bg-green-700',
                'description' => 'Perencanaan dan stabilitas jalan raya.'
            ],

            [
                'name' => 'Infrastruktur Air',
                'category' => 'infrastruktur',
                'icon' => 'fa-water',
                'badge' => 'Water',
                'badgeColor' => 'bg-cyan-700',
                'description' => 'Hydraulic engineering dan bendungan.'
            ],

            [
                'name' => 'Minyak Bumi Gas',
                'category' => 'energi',
                'icon' => 'fa-oil-well',
                'badge' => 'Oil & Gas',
                'badgeColor' => 'bg-orange-700',
                'description' => 'Offshore engineering dan geoteknik migas.'
            ],

            [
                'name' => 'Jalur Kereta Api',
                'category' => 'transportasi',
                'icon' => 'fa-train',
                'badge' => 'Railway',
                'badgeColor' => 'bg-indigo-700',
                'description' => 'Railway engineering dan embankment.'
            ],

            [
                'name' => 'Kawasan Bandar Udara',
                'category' => 'transportasi',
                'icon' => 'fa-plane',
                'badge' => 'Airport',
                'badgeColor' => 'bg-sky-700',
                'description' => 'Airport infrastructure engineering.'
            ],

            [
                'name' => 'Kawasan Pelabuhan',
                'category' => 'transportasi',
                'icon' => 'fa-ship',
                'badge' => 'Port',
                'badgeColor' => 'bg-blue-800',
                'description' => 'Marine structure dan pelabuhan.'
            ],

            [
                'name' => 'Kawasan Industri',
                'category' => 'infrastruktur',
                'icon' => 'fa-industry',
                'badge' => 'Industrial',
                'badgeColor' => 'bg-gray-700',
                'description' => 'Industrial area development.'
            ],

            [
                'name' => 'Fasilitas Pendidikan',
                'category' => 'infrastruktur',
                'icon' => 'fa-school',
                'badge' => 'Education',
                'badgeColor' => 'bg-purple-700',
                'description' => 'Educational building engineering.'
            ],

        ]);

        $currentPage = request()->get('page', 1);

        $perPage = 6;

        $pagedData = $sectors->forPage($currentPage, $perPage);

        $sectors = new \Illuminate\Pagination\LengthAwarePaginator(
            $pagedData,
            $sectors->count(),
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );

        return view('sektor.semua-sektor', compact('sectors'));
    }
}