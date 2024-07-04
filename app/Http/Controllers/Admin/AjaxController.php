<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Branch;
use App\Models\BuyPackage;
use App\Models\Employee;
use App\Models\NewsEvent;
use App\Models\Notice;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function sortNewsEvent(Request $request)
    {
        if ($request->news_event_sort == 'newest_news_events') {
            $sort_result = NewsEvent::where('status', 1)->orderBy('id', 'desc')->get();
        }
        if ($request->news_event_sort == 'oldest_news_events') {
            $sort_result = NewsEvent::where('status', 1)->orderBy('id', 'asc')->get();
        }

        return view('frontend.ajax_filter.sort_news_events', compact('sort_result'))->render();
    }

    public function searchNewsEvent(Request $request)
    {
        $data['news_event_search'] = NewsEvent::where('status', 1)->where('en_title', 'like', '%' . $request->search_string . '%')
            ->orWhere('bn_title', 'like', '%' . $request->search_string . '%')
            ->orderBy('id', 'desc')
            ->where('status', 1)
            ->get();

        if ($data['news_event_search']->count() >= 1) {
            return view('frontend.ajax_filter.search_news_event', $data)->render();
        } else {
            return response()->json([
                'status' => 'nothing found',
            ]);
        }
    }

    public function sortBranch($id, $sort = 'asc')
    {

        if (!in_array($sort, ['asc', 'desc'])) {
            $sort = 'asc'; 
        }
    
        $locale = parseLocale(); 
    
        $branchQuery = Branch::where(function ($query) use ($id) {
            if ($id != 'all') {
                $query->where('branch_category_id', $id);
            }
        })->where('status', 1);
    
        $columnName = ($locale === '/') ? 'en_branch_name' : 'bn_branch_name';
    
        $branch_list = $branchQuery->orderBy($columnName, $sort)->get();
    
        if ($branch_list->count() >= 1) {
            return view('frontend.ajax_filter.sort_branch', compact('branch_list'));
        } else {
            return response()->json([
                'status' => 'nothing found',
            ]);
        }
    }
    


    public function searchBranch(Request $request)
    {
        $data['branch_search'] = Branch::where('status', 1)->where('en_address', 'like', '%' . $request->search_string . '%')
            ->orWhere('bn_address', 'like', '%' . $request->search_string . '%')
            ->orderBy('id', 'desc')
            ->where('status', 1)
            ->get();

        if ($data['branch_search']->count() >= 1) {
            return view('frontend.ajax_filter.search_branch', $data)->render();
        } else {
            return response()->json([
                'status' => 'nothing found',
            ]);
        }
    }

    public function searchBlog(Request $request)
    {
        $data['blog_search'] = Blog::where('status', 1)->where('en_title', 'like', '%' . $request->search_string . '%')
            ->orWhere('bn_title', 'like', '%' . $request->search_string . '%')
            ->orderBy('id', 'desc')
            ->where('status', 1)
            ->get();

        if ($data['blog_search']->count() >= 1) {
            return view('frontend.ajax_filter.search_blog', $data)->render();
        } else {
            return response()->json([
                'status' => 'nothing found',
            ]);
        }
    }

    public function sortBlogByCategory($id)
    {

        $blog_list_by_category = Blog::where(function ($query) use ($id) {
            if ($id != 'all') {
                $query->where('blog_category_id', $id);
            }
        })->where('status', 1)->get();
        if ($blog_list_by_category->count() >= 1) {
            return view('frontend.ajax_filter.sort_blog_by_category', compact('blog_list_by_category'));
        } else {
            return response()->json([
                'status' => 'nothing found',
            ]);
        }
    }
    public function sortBlogByTag($id)
    {

        $blog_list_by_tag = Blog::where(function ($query) use ($id) {
            if ($id != 'all') {
                $query->where('blog_tag_id', $id);
            }
        })->where('status', 1)->get();
        if ($blog_list_by_tag->count() >= 1) {
            return view('frontend.ajax_filter.sort_blog_by_tag', compact('blog_list_by_tag'));
        } else {
            return response()->json([
                'status' => 'nothing found',
            ]);
        }
    }
}
