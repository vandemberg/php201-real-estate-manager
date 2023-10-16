import { Link } from "@inertiajs/react";
import React from "react";

function trimDescription(description) {
    if(!description) return 'no description';

    if(description.length > 50) {
        return description.substring(0, 50) + '...';
    }

    return description;
}

export default function PropertyCard({ property }) {
    return (
        <Link href={`/properties/${property.id}`}>
            <div className="flex flex-row w-full justify-between rounded overflow-hidden shadow-2xl m-5 h-80">
                <div className="w-1/2 flex flex-col items-center content-center m-5">
                    <img className="w-96 shadow-2xl" src={property.image} alt={property.title} />
                </div>

                <div className="w-1/2 px-6 py-4">
                    <div className="font-bold text-xl mb-2">{property.title}</div>
                    <p className="text-gray-700 text-base">{property.address}</p>
                    <div className="pl-5">
                        <p className="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{property.code}</p>
                        <p>Description: {trimDescription(property.description)}</p>
                        <p>Price: {property.price}</p>
                        <p>Bedrooms: {property.bedrooms}</p>
                        <p>Bathrooms: {property.bathrooms}</p>
                        <p>Garages: {property.garages}</p>
                        <p>Responsible: {property.broker_id}</p>
                    </div>
                </div>
            </div>
        </Link>
    );
}
