<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .form-container {
            margin: 50px auto;
            max-width: 600px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-container label {
            font-weight: bold;
            color: #555;
        }

        .form-container input,
        .form-container select {
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .form-container button {
            width: 100%;
            background-color: #28a745;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1>Add New Member</h1>
            <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Name -->
                <div class="mb-3">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter Member's Name"
                        required>
                </div>

                <!-- Gender -->
                <div class="mb-3">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" class="form-select" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <!-- Parent Member -->
                <div class="mb-3">
                    <label for="parentId">Parent:</label>
                    <select id="parentId" name="parent_id" class="form-select">
                        <option value="" selected>Root (No Parent)</option>
                        @foreach ($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Role -->
                <div class="mb-3">
                    <label for="role">Role:</label>
                    <select id="role" name="role" class="form-select">
                        <option value="" disabled selected>Select Role</option>
                        <option value="grandfather">Grandfather</option>
                        <option value="grandmother">Grandmother</option>
                        <option value="father">Father</option>
                        <option value="mother">Mother</option>
                        <option value="brother">Brother</option>
                        <option value="sister">Sister</option>
                        <option value="spouse">Spouse</option>
                        <option value="son">Son</option>
                        <option value="daughter">Daughter</option>
                        <option value="uncle">Uncle</option>
                        <option value="aunt">Aunt</option>
                        <option value="nephew">Nephew</option>
                        <option value="niece">Niece</option>
                        <option value="cousin">Cousin</option>
                        <option value="brother-in-law">Brother-in-law</option>
                        <option value="sister-in-law">Sister-in-law</option>
                        <option value="father-in-law">Father-in-law</option>
                        <option value="mother-in-law">Mother-in-law</option>
                        <option value="grandson">Grandson</option>
                        <option value="granddaughter">Granddaughter</option>
                    </select>
                </div>

                <!-- Profile Picture -->
                <div class="mb-3">
                    <label for="profilePhoto">Profile Picture:</label>
                    <input type="file" id="profilePhoto" name="profile_photo" class="form-control">
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="btn btn-success">Add Member</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
