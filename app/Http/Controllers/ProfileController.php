<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $teamMembers = [
            [
                'id' => 1,
                'name' => 'Chika Putri',
                'role' => 'CEO',
                'photo' => 'https://picsum.photos/150/150?random=1',
                'biodata' => 'Chika Putri adalah CEO kami yang berdedikasi, memimpin visi dan strategi perusahaan dengan inovasi dan semangat. Dengan pengalaman bertahun-tahun di industri, ia memastikan setiap produk Es Telang ZtoA mencapai standar kualitas tertinggi.'
            ],
            [
                'id' => 2,
                'name' => 'Anang Ridho',
                'role' => 'CTO',
                'photo' => 'https://picsum.photos/150/150?random=2',
                'biodata' => 'Anang Ridho, CTO kami, adalah otak di balik teknologi dan operasional kami. Keahliannya dalam sistem dan efisiensi memastikan bahwa proses produksi dan distribusi berjalan lancar dan inovatif.'
            ],
            [
                'id' => 3,
                'name' => 'Zalfa Tri',
                'role' => 'Lead Designer',
                'photo' => 'https://picsum.photos/150/150?random=3',
                'biodata' => 'Zalfa Tri adalah Lead Designer kami, yang bertanggung jawab atas estetika visual dan branding Es Telang ZtoA. Dengan sentuhan artistiknya, setiap kemasan dan materi promosi menjadi menarik dan berkesan.'
            ],
            [
                'id' => 4,
                'name' => 'M. Adib',
                'role' => 'Lead Developer',
                'photo' => 'https://picsum.photos/150/150?random=4',
                'biodata' => 'M. Adib, Lead Developer kami, adalah pengembang utama di balik platform digital kami. Ia memastikan website dan aplikasi kami berfungsi dengan sempurna, memberikan pengalaman terbaik bagi pelanggan.'
            ],
            [
                'id' => 5,
                'name' => 'Vresty Pasha',
                'role' => 'Marketing',
                'photo' => 'https://picsum.photos/150/150?random=5',
                'biodata' => 'Vresty Pasha adalah ahli pemasaran kami, yang membawa Es Telang ZtoA dikenal luas. Strategi pemasarannya yang kreatif dan efektif membantu kami menjangkau lebih banyak pelanggan dan membangun komunitas yang kuat.'
            ],
        ];

        return view('profile.edit', [
            'user' => $request->user(),
            'teamMembers' => $teamMembers, // Pass team members data
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}