import React from "react";
import Layout from '@/Layouts/Layout';
import { Head } from '@inertiajs/react';
import PropertyCard from '../../Components/PropertyCard';

export default function Properties({ properties }) {
    return (
        <Layout>
            <Head title="Imóveis" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <h3 className="text-lg font-medium mb-4">Lista de imóveis</h3>
                            <div className="flex justify-between flex-row flex-wrap">
                                {properties.map(property => (
                                    <PropertyCard key={property.id} property={property} />
                                ))}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Layout>
    );
}
