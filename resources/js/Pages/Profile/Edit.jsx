import React, { useState } from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import DeleteUserForm from './Partials/DeleteUserForm';
import UpdatePasswordForm from './Partials/UpdatePasswordForm';
import { Head } from '@inertiajs/react';
import UpdateProfileForm from './Partials/UpdateProfileForm';

export default function Edit({ auth, mustVerifyEmail, status }) {
    const user = auth.user;
    const [photo, setPhoto] = useState(null);
    const [photoUrl, setPhotoUrl] = useState(user.photo_url);
    const [message, setMessage] = useState('');

    const handlePhotoChange = (e) => {
        const file = e.target.files[0];
        setPhoto(file);
    };

    const handlePhotoUpload = async (e) => {
        e.preventDefault();
        const formData = new FormData();
        formData.append('photo', photo);

        try {
            const response = await fetch('/profile/upload-photo', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${user.token}`,
                },
                body: formData,
            });

            const data = await response.json();

            if (response.ok) {
                setPhotoUrl(data.photo_url);
                setMessage('Photo uploaded successfully');
            } else {
                setMessage(`Error: ${data.message}`);
            }
        } catch (error) {
            setMessage(`Error: ${error.message}`);
        }
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>}
        >
            <Head title="Profile" />

            <div className="flex items-center justify-center">
                <img
                    src={photoUrl ? photoUrl : '/path/to/default/photo.jpg'}
                    alt="User Photo"
                    className="w-24 h-24 rounded-full mx-auto"
                />
            </div>

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <UpdateProfileForm user={user} />
                    </div>

                    <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <h2 className="text-xl font-semibold text-gray-800 leading-tight mb-4">Update Profile Photo</h2>
                        {message && <div className={`alert ${message.includes('successfully') ? 'alert-success' : 'alert-danger'}`}>{message}</div>}
                        <form onSubmit={handlePhotoUpload} className="space-y-6">
                            <input type="file" onChange={handlePhotoChange} />
                            <button type="submit" className="btn btn-primary mt-4">Uploader la photo</button>
                        </form>
                    </div>

                    <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <UpdatePasswordForm className="max-w-xl" />
                    </div>

                    <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <DeleteUserForm className="max-w-xl" />
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
