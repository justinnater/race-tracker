import { Car } from "../../utilities/Parser/Types";

/** The props for the CarOverview component */
export type CarOverviewProps = {
    /** The car to display */
    activeCar: Car;
    /** The function to update the car */
    updateCar: (car: Car, props: Partial<Car>) => void;
}
