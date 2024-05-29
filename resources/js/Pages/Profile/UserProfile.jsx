import React, { useState } from 'react';

const UserProfile = ({ user }) => {
    const [photo, setPhoto] = useState(null);
    const [photoUrl, setPhotoUrl] = useState(user.photo_url);
    const [message, setMessage] = useState('');

    const handlePhotoChange = (e) => {
        const file = e.target.files[0];
        setPhoto(file);
    };

    const handlePhotoUpload = async () => {
        const formData = new FormData();
        formData.append('photo', photo);

        try {
            const response = await fetch('/profile/upload-photo', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${user.token}`, // Assuming you have a token-based auth
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
        <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <h2 className="text-xl font-semibold text-gray-800 leading-tight mb-4">Informations de l'utilisateur</h2>
            {message && <div className={`alert ${response.ok ? 'alert-success' : 'alert-danger'}`}>{message}</div>}
            <div className="space-y-2">
                <div>
                    <strong>Photo de Profil: </strong>
                    {photoUrl ? (
                        <img src={photoUrl} alt="Photo de Profil" className="w-16 h-16 rounded-full" />
                    ) : (
                        'Aucune photo'
                    )}
                </div>
                <div>
                    <input type="file" onChange={handlePhotoChange} />
                    <button onClick={handlePhotoUpload} className="btn btn-primary">Uploader la photo</button>
                </div>
                <div>
                    <strong>Prénom: </strong> {user.firstname}
                </div>
                <div>
                    <strong>Nom: </strong> {user.lastname}
                </div>
                <div>
                    <strong>Email: </strong> {user.email}
                </div>
                <div>
                    <strong>Login: </strong> {user.login}
                </div>
                <div>
                    <strong>Langue: </strong> {user.langue}
                </div>
                <div>
                    <strong>Rôles: </strong> {user.roles_list ? user.roles_list.join(', ') : 'Aucun rôle'}
                </div>
            </div>
        </div>
    );
};

export default UserProfile;
