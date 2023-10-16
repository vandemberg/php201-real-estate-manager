import React from "react";
import AuthenticatedLayout from "../../Layouts/AuthenticatedLayout";
import { Head } from '@inertiajs/react';

function Brokers({ brokers, auth }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Corretores
                </h2>
            }
        >
            <Head title="Corretores" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <h3 className="text-lg font-medium mb-4">
                                Lista de corretores
                            </h3>

                            <table className="table-auto">
                                <thead>
                                    <tr>
                                        <th className="px-4 py-2">ID</th>
                                        <th className="px-4 py-2">Nome</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {brokers.map((broker) => (
                                        <tr key={broker.id}>
                                            <td className="border px-4 py-2">
                                                {broker.id}
                                            </td>
                                            <td className="border px-4 py-2">
                                                {broker.name}
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

export default Brokers;
