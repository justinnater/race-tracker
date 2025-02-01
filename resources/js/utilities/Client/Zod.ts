import { z } from "zod";

const LapTimeSchema = z.object({
    type: z.literal("lap_times"),
    id: z.string(),
    attributes: z.object({
        lap_number: z.number(),
        lap_time: z.string(),
    })
});

export type LapTimeResponse = z.infer<typeof LapTimeSchema>;

const LapTimeRelationshipSchema = z.object({
    data: z.array(z.object({
        type: z.literal("lap_times"),
        id: z.string()
    }))
});

const CarSchema = z.object({
    type: z.literal("cars"),
    id: z.string(),
    attributes: z.object({
        number: z.number(),
        driver: z.string(),
        model: z.string(),
        team: z.string(),
        color: z.string(),
        average_lap_time: z.string(),
    }),
    relationships: z.object({
        lap_times: LapTimeRelationshipSchema
    })
});

export type CarResponse = z.infer<typeof CarSchema>;

export const CarCollectionApiResponseSchema = z.object({
    jsonapi: z.object({
        version: z.literal("1.0")
    }),
    links: z.object({
        self: z.string().url()
    }),
    data: z.array(CarSchema),
    included: z.array(LapTimeSchema)
});

export type CarCollectionApiResponse = z.infer<typeof CarCollectionApiResponseSchema>;

export const CarApiResponseSchema = z.object({
    jsonapi: z.object({
        version: z.literal("1.0")
    }),
    links: z.object({
        self: z.string().url()
    }),
    data: CarSchema,
    included: z.array(LapTimeSchema)
});

export type CarApiResponse = z.infer<typeof CarApiResponseSchema>;

