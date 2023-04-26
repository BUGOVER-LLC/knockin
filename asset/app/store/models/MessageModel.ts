/** @format */

export interface MessageModel {
    body: string;
    createdAt: string;
    targetId: string;
    in: boolean;
    out: boolean;
    viewed: null | boolean;
    edited: null | boolean;
    editedAt: null | string;
    discussion: null | [];
    type: null | string;
}
