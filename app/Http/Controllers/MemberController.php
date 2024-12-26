<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        $members = Member::all();
        return view('members.create', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'role' => 'required|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $photoPath = null;

        if ($request->hasFile('profile_photo')) {
            $photoPath = $request->file('profile_photo')->store('photos', 'public');
        }

        Member::create([
            'parent_id' => $request->parent_id, 
            'name' => $request->name,
            'gender' => $request->gender,
            'role' => $request->role,
            'profile_photo' => $photoPath,
        ]);

        return redirect()->route('members.index')->with('success', 'Member added successfully!');
    }

    public function treeView()
    {
        $members = Member::all(); 
        $treeData = $this->buildFamilyTree($members);

        return view('members.tree', compact('treeData'));
    }

    private function buildFamilyTree($members, $parentId = null)
    {
        $tree = [];

        foreach ($members as $member) {
            if ($member->parent_id == $parentId) {
                $node = [
                    'text' => $member->name . " (" . $member->role . ")",
                    'icon' => ($member->gender === 'male') ? 'fa fa-male' : 'fa fa-female',
                ];

                $children = $this->buildFamilyTree($members, $member->id);
                if ($children) {
                    $node['children'] = $children;
                }

                $tree[] = $node;
            }
        }

        return $tree;
    }
}
