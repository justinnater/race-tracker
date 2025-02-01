/** Type for the car model used in the application */
export type Car = {
    /** The ID of the car */
    id: string;
    /** The number of the car */
    number: number;
    /** The driver of the car */
    driver: string;
    /** The model of the car */
    model: string;
    /** The team of the car */
    team: string;
    /** The color of the car */
    color: string;
    /** The average lap time of the car */
    averageLapTime: string;
    /** The lap times of the car */
    lapTimes: LapTime[];
}

/** Type for the lap time model used in the application */
export type LapTime = {
    /** The lap number */
    lapNumber: number;
    /** The lap time */
    lapTime: string;
}
