import { Car } from "../../utilities/Parser/Types";

/** The props for the CarListing component */
export type CarListingProps = {
    /** The list of cars to display */
    cars: Car[];
    /** active car */
    activeCar: Car | null;
    /** Callback to set the active car */
    setActiveCar: (car: Car) => void;
}
