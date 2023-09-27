import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';

export default function Properties({ auth, properties }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Imóveis</h2>}
        >
            <Head title="Imóveis" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <h3 className="text-lg font-medium mb-4">Lista de imóveis</h3>
                            <ul className="divide-y divide-gray-200">
                                {properties.map(property => (
                                    <li key={property.id} className="py-4">
                                        <Link href={`/properties/${property.id}`} className="block hover:text-gray-600">
                                            <h4 className="text-lg font-medium">{property.title}</h4>
                                            <p className="text-gray-500">{property.address}</p>
                                        </Link>
                                    </li>
                                ))}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
