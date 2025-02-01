export const formatLapTime = (lapTime: number): string => {
    if (isNaN(lapTime) || lapTime < 0) return "Invalid time";

    const hours = Math.floor(lapTime / 3600);
    const minutes = Math.floor((lapTime % 3600) / 60);
    const seconds = Math.floor(lapTime % 60);
    const milliseconds = Math.round((lapTime % 1) * 1000); // Convert decimal part to ms

    return `${String(hours).padStart(2, '0')}:` +
        `${String(minutes).padStart(2, '0')}:` +
        `${String(seconds).padStart(2, '0')}.` +
        `${String(milliseconds).padStart(3, '0')}`;
}

export const validInput = (lapTime: number): boolean => {
    return !(lapTime < 60 || lapTime > 90);
};
