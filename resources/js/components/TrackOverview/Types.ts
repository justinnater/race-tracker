import { Car } from "../../utilities/Parser/Types";

/** The props for the TrackOverview component */
export type TrackOverviewProps = {
    /** The active car */
    activeCar: Car;
    /** All the cars */
    cars: Car[];
}
