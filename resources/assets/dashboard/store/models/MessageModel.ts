/** @format */

export type MessageModel = {
    body: string;
    createdAt: string;
    targetId: string;
    in: boolean;
    out: boolean;
    viewed: null | boolean;
    viewedAt: null | string;
    edited: null | boolean;
    editedAt: null | string;
    discussion: null | [];
    type: null | string;
};
