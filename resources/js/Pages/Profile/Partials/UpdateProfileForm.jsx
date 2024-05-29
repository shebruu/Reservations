import React, { useState } from 'react';

const UpdateProfileForm = ({ user }) => {
    const [firstname, setFirstname] = useState(user.firstname);
    const [lastname, setLastname] = useState(user.lastname);
    const [email, setEmail] = useState(user.email);
    const [message, setMessage] = useState('');
    const [processing, setProcessing] = useState(false);
    const [errors, setErrors] = useState({});

    const handleProfileUpdate = async (e) => {
        e.preventDefault();
        setProcessing(true);

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const response = await fetch(route('profile.update'), {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Authorization': `Bearer ${user.token}`,
                },
                body: JSON.stringify({ firstname, lastname, email }),
            });

            const data = await response.json();

            if (response.ok) {
                setMessage('Profile updated successfully!');
            } else {
                setErrors(data.errors || {});
                setMessage('Error updating profile');
            }
        } catch (error) {
            setMessage('Error updating profile');
        } finally {
            setProcessing(false);
        }
    };

    return (
        <>
            <h2 className="text-xl font-semibold text-gray-800 leading-tight mb-4">Update Profile Information</h2>
            {message && <div className={`alert ${message.includes('successfully') ? 'alert-success' : 'alert-danger'}`}>{message}</div>}
            <form onSubmit={handleProfileUpdate} className="space-y-6">
                <div>
                    <label htmlFor="firstname">Prénom</label>
                    <input
                        type="text"
                        id="firstname"
                        className="mt-1 block w-full"
                        value={firstname}
                        onChange={(e) => setFirstname(e.target.value)}
                    />
                    {errors.firstname && <div className="text-red-600">{errors.firstname}</div>}
                </div>

                <div>
                    <label htmlFor="lastname">Nom</label>
                    <input
                        type="text"
                        id="lastname"
                        className="mt-1 block w-full"
                        value={lastname}
                        onChange={(e) => setLastname(e.target.value)}
                    />
                    {errors.lastname && <div className="text-red-600">{errors.lastname}</div>}
                </div>

                <div>
                    <label htmlFor="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        className="mt-1 block w-full"
                        value={email}
                        onChange={(e) => setEmail(e.target.value)}
                    />
                    {errors.email && <div className="text-red-600">{errors.email}</div>}
                </div>

                <div className="flex items-center justify-end mt-4">
                    <button type="submit" className="ml-4" disabled={processing}>
                        Mettre à jour
                    </button>
                </div>
            </form>
        </>
    );
};

export default UpdateProfileForm;
