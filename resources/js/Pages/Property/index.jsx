import React, { useState } from 'react';
import Guest from '@/Layouts/GuestLayout';

function Property({ property, csrf_token }) {
    const [email, setEmail] = useState('');

    const handleSubmit = async (event) => {
        event.preventDefault();
        const propertyId = property.id; // replace with actual property ID
        const response = await fetch('/leads', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf_token,
            },
            body: JSON.stringify({ propertyId, email }),
        });
        if (response.ok) {
            alert('Lead submitted successfully!');
        } else {
            alert('Failed to submit lead.');
        }
    };

    return (
        <Guest>
            <form onSubmit={handleSubmit} className="max-w-md mx-auto">
                <input type="hidden" name="_token" value={csrf_token} />

                <div className="flex flex-col mb-4">
                    <label htmlFor="email" className="mb-2 font-bold text-lg text-gray-900">Email:</label>
                    <input
                        type="email"
                        id="email"
                        value={email}
                        onChange={(event) => setEmail(event.target.value)}
                        className="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-transparent"
                    />
                </div>
                <button
                    type="submit"
                    className="px-4 py-2 font-bold text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50"
                >
                    Criar lead
                </button>
            </form>
        </Guest>
    );
}

export default Property;
