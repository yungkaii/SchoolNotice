<?php

namespace Tests\Feature;

use App\Models\Announcement;
use App\Models\Event;
use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SchoolNoticeFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_homepage_renders_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('School');
        $response->assertSee('Notice');
        $response->assertSee('SMKN 1 CIOMAS');
    }

    public function test_public_announcements_index_and_detail_render(): void
    {
        $response = $this->get('/pengumuman');
        $response->assertStatus(200);
        $response->assertSee('Pengumuman');

        $announcement = Announcement::first();
        if ($announcement) {
            $showResponse = $this->get('/pengumuman/'.$announcement->slug);
            $showResponse->assertStatus(200);
            $showResponse->assertSee($announcement->title);
        }
    }

    public function test_public_events_index_and_detail_render(): void
    {
        $response = $this->get('/event');
        $response->assertStatus(200);
        $response->assertSee('Event');

        $event = Event::first();
        if ($event) {
            $showResponse = $this->get('/event/'.$event->slug);
            $showResponse->assertStatus(200);
            $showResponse->assertSee($event->title);
        }
    }

    public function test_public_news_index_and_detail_render(): void
    {
        $response = $this->get('/berita');
        $response->assertStatus(200);
        $response->assertSee('Berita');

        $news = News::first();
        if ($news) {
            $showResponse = $this->get('/berita/'.$news->slug);
            $showResponse->assertStatus(200);
            $showResponse->assertSee($news->title);
        }
    }

    public function test_public_achievements_page_renders(): void
    {
        $response = $this->get('/prestasi');
        $response->assertStatus(200);
        $response->assertSee('Prestasi');
    }

    public function test_public_about_page_renders(): void
    {
        $response = $this->get('/tentang');
        $response->assertStatus(200);
        $response->assertSee('SMKN 1 CIOMAS');
        $response->assertSee('Visi');
        $response->assertSee('Misi');
    }

    public function test_guest_is_redirected_from_admin_dashboard_to_login(): void
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/login');
    }

    public function test_admin_can_login_and_access_dashboard(): void
    {
        $loginResponse = $this->post('/login', [
            'email' => 'admin@schoolnotice.test',
            'password' => 'password',
        ]);

        $loginResponse->assertRedirect('/admin/dashboard');

        $user = User::where('email', 'admin@schoolnotice.test')->first();
        $dashboardResponse = $this->actingAs($user)->get('/admin/dashboard');
        $dashboardResponse->assertStatus(200);
        $dashboardResponse->assertSee('Ringkasan & Statistik');
    }

    public function test_admin_can_view_crud_index_pages(): void
    {
        $user = User::where('email', 'admin@schoolnotice.test')->first();

        $this->actingAs($user)->get('/admin/pengumuman')->assertStatus(200)->assertSee('Kelola Pengumuman');
        $this->actingAs($user)->get('/admin/event')->assertStatus(200)->assertSee('Kelola Event & Agenda');
        $this->actingAs($user)->get('/admin/berita')->assertStatus(200)->assertSee('Kelola Berita Sekolah');
        $this->actingAs($user)->get('/admin/prestasi')->assertStatus(200)->assertSee('Kelola Prestasi Siswa');
        $this->actingAs($user)->get('/admin/kategori')->assertStatus(200)->assertSee('Kategori Konten');
        $this->actingAs($user)->get('/admin/users')->assertStatus(200)->assertSee('Kelola Akun Administrator');
    }

    public function test_admin_can_create_new_category(): void
    {
        $user = User::where('email', 'admin@schoolnotice.test')->first();

        $categoryName = 'Kategori Uji '.rand(1000, 9999);
        $response = $this->actingAs($user)->post('/admin/kategori', [
            'name' => $categoryName,
            'description' => 'Deskripsi kategori untuk automated test',
        ]);

        $response->assertRedirect(route('admin.kategori.index'));
        $this->assertDatabaseHas('categories', ['name' => $categoryName]);
    }
}
